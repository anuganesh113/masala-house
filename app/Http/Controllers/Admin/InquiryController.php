<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Http\Controllers\BaseController;
use App\Models\Inquiry;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * Class InquiryController
 */
class InquiryController extends BaseController
{
    public function __construct(
        protected Inquiry $inquiryModel,
        protected DatabaseManager $databaseManager
    ) {}

    public function index(): View
    {
        $data['inquiries'] = $this->inquiryModel->with(['product:id,name'])->latest()->get();

        return view('admin.pages.inquiry.index', $data);
    }

    public function delete(Inquiry $inquiry): JsonResponse
    {
        $inquiry->delete();

        return $this->jsonResponse(
            General::TRUE,
            'Data Deleted Successfully',
            ResponseAlias::HTTP_ACCEPTED
        );

    }
}
