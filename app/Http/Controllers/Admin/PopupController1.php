<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Message;
use App\Enums\UploadFilePath;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Popup\PopupRequest;
use App\Models\Popup;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * class PopupController
 */
class PopupController extends BaseController
{
    protected string $uploadPath;
    
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Popup $popupModel,
    ) {
        // Define the upload path once in the constructor
        $this->uploadPath = public_path(UploadFilePath::POPUPS_PATH);
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $popups = $this->popupModel->query()
            ->select(['id','name','title','image','order','status','created_at'])
            ->orderBy('order')
            ->get();

        return view('admin.pages.popups.index', ['popups' => $popups]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.pages.popups.create');
    }

    /**
     * @throws Throwable
     */
    public function store(PopupRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();

     
            // Ensure upload directory exists
            $this->ensureUploadDirectoryExists();
            
            $data = $request->prepareData();
            
            // If the prepareData method handles file upload, make sure it uses the correct path
            // Otherwise, handle file upload here
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
               // dd($fileName);
                
                // Move the file to the upload directory
                $file->move($this->uploadPath, $fileName);
                
                // Update data with the filename
                $data['image'] = $fileName;
            }
            
            $this->popupModel->query()->create($data);
            
            $this->databaseManager->commit();

            return to_route('admin.popups.index')
                ->with('success', Message::POPUP_MESSAGE['CREATE_SUCCESS']);
                
       
    }

    /**
     * Ensure upload directory exists with proper permissions
     */
    private function ensureUploadDirectoryExists(): void
    {
        try {
            // Create directory with full permissions if it doesn't exist
            if (!File::exists($this->uploadPath)) {
                // Create directory recursively
                File::makeDirectory($this->uploadPath, 0755, true);
                
                Log::info('Created upload directory', ['path' => $this->uploadPath]);
            }
            
            // Ensure directory is writable
            if (!is_writable($this->uploadPath)) {
                chmod($this->uploadPath, 0755);
                Log::info('Set permissions for upload directory', ['path' => $this->uploadPath]);
            }
            
            // Create security files
            $this->createSecurityFiles();
            
        } catch (\Exception $e) {
            Log::error('Failed to create upload directory', [
                'path' => $this->uploadPath,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }
    
    /**
     * Create security files in the upload directory
     */
    private function createSecurityFiles(): void
    {
        // Create index.html for security
        $indexFile = $this->uploadPath . '/index.html';
        if (!File::exists($indexFile)) {
            File::put($indexFile, '<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1></body></html>');
        }
        
        // Create .htaccess for security (if using Apache)
        $htaccessFile = $this->uploadPath . '/.htaccess';
        if (!File::exists($htaccessFile)) {
            File::put($htaccessFile, "Options -Indexes\n<FilesMatch \"\\.(php|php3|php4|php5|phtml|phps)\">\nOrder Deny,Allow\nDeny from all\n</FilesMatch>");
        }
    }

    /**
     * @param Popup $popup
     * @return View
     */
    public function edit(Popup $popup): View
    {
        return view('admin.pages.popups.edit', ['popup' => $popup]);
    }

    /**
     * @param PopupRequest $request
     * @param Popup $popup
     * @return RedirectResponse
     *
     * @throws Throwable
     */
    public function update(PopupRequest $request, Popup $popup): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        
        try {
            $data = $request->prepareData();
            $backupImage = $popup->image;
            
            // Handle file upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                
                // Move the file to the upload directory
                $file->move($this->uploadPath, $fileName);
                
                // Update data with the filename
                $data['image'] = $fileName;
            }
            
            $popup->update($data);

            // Delete old image if new one was uploaded
            if ($request->hasFile('image') && $backupImage) {
                $oldImagePath = $this->uploadPath . '/' . $backupImage;
                if (File::exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }
            
            $this->databaseManager->commit();

            return to_route('admin.popups.index')
                ->with('success', Message::POPUP_MESSAGE['UPDATE_SUCCESS']);
                
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            
            // Clean up newly uploaded file if it exists
            if (isset($fileName) && File::exists($this->uploadPath . '/' . $fileName)) {
                @unlink($this->uploadPath . '/' . $fileName);
            }

            Log::error('Popup update error: ' . $error->getMessage(), [
                'trace' => $error->getTraceAsString()
            ]);

            return back()
                ->withInput($request->all())
                ->with('error', $error->getMessage());
        }
    }

    /**
     * @param Popup $popup
     * @return JsonResponse
     */
    public function destroy(Popup $popup): JsonResponse
    {
        try {
            $imagePath = $this->uploadPath . '/' . $popup->image;
            
            $popup->delete();
            
            // Delete the image file if it exists
            if (File::exists($imagePath)) {
                @unlink($imagePath);
            }
            
        } catch (Exception $error) {
            Log::error('Popup delete error: ' . $error->getMessage());
            return $this->jsonResponse(false, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(true, Message::POPUP_MESSAGE['DELETE_SUCCESS']);
    }
}