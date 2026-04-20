@extends('site.layouts.layout')
@section('page_title', 'checkout')
@push('header')
<style>
   .main-header-two {
      top: 0 !important;
      box-shadow: 0px 4px 4px 0px rgba(225, 225, 225, 0.2);
      background-color: #ffffff;
   }

   .main-menu-two__logo a.color {
      display: block !important;
   }

   .main-menu-two__logo a.plain {
      display: none;
   }

   .main-menu .main-menu__list>li>a {
      color: #080808 !important;
   }

   .main-menu .main-menu__list>li>a.active,
   .main-menu .main-menu__list>li>a:hover {
      color: #FF6F00 !important;
   }

   .main-header-two .main-menu__list .border-menu.primary {
      background-color: #FF6F00 !important;
      color: #ffffff !important;
   }

   .main-header-two .main-menu__list .border-menu.secondary a,
   .main-header-two .main-menu__list .border-menu.primary a {
      color: #ffffff !important;
   }

   .main-header-two .main-menu__list .border-menu.secondary {
      background-color: #080808 !important;
   }

   .footer {
      padding-top: 120px !important;
      margin-top: -55px;
   }
</style>
@endpush
@section('content')

<section class="breadcrumb__custom">
   <div class="container-fluid">
      <a href="">Home</a>
      <span>
         <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1)">
            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
         </svg>
      </span>
      <a class="active">Menu Section</a>
   </div>
</section>


<section class="checkout mb-5">
   <div class="container-fluid">
      <div id="container" class=" mt-5">
      </div>
      <div class="top">
         <div class="progress px-1" style="height: 3px;">
            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
               aria-valuemin="0" aria-valuemax="100"></div>
         </div>
         <div class="step-container d-flex justify-content-between gap-2">
            <div class="step-box active">
               <div class="step-box-circle" onclick="displayStep(1)">
                  <span>Step 1</span>
               </div>
               <h4>Menu Selection</h4>
            </div>
            <div class="step-box ">
               <div class="step-box-circle" onclick="displayStep(2)">
                  <span>Step 2</span>
               </div>
               <h4>Menu Cusomisation</h4>
            </div>
            <div class="step-box">
               <div class="step-box-circle" onclick="displayStep(3)">
                  <span>Step 3</span>
               </div>
               <h4>Payment & Delivery Confirmation</h4>
            </div>
            <div class="step-box">
               <div class="step-box-circle" onclick="displayStep(4)">
                  <span>Step 4</span>
               </div>
               <h4>Order Comnpletion</h4>
            </div>
         </div>
      </div>

      <form id="multi-step-form">
         <div class="step step-1">
            <!-- Step 1 form fields here -->
            <div class="row">
               <div class="col-lg-8 mb-5 mb-lg-0">
                  @include("site.includes.checkout-list-card")
               </div>
               <div class="col-lg-4">
                  <div class="sidebar">
                     <div class="title">
                        <h3>Your Previous Order</h3>
                        <p>Please input your Contact Number and OTP to
                           View your previous order </p>
                     </div>
                     <div action="" class="otp">
                        <div class="mb-4">
                           <label for="">Enter Phone Number</label>
                           <input type="text" placeholder="Enter Phone Number">
                           <button type="submit" class="l__button l__button--primary">Send OTP</button>
                        </div>
                        <div>
                           <label for="">Please Input your OTP</label>
                           <input type="text" placeholder="OTP">
                           <div class="d-flex justify-content-between mt-3">
                              <small>OTP Verification Successful</small>
                              <a href="">Re-send OTP</a>
                           </div>
                        </div>
                     </div>
                     <div class="reorder">
                        <h3>Select and Reorder at One Tap</h3>
                        <ul class="reorder__list">
                           <li class="reorder__card">
                              <div class="reorder__card--img">
                                 <div class="image" style="background-image: url('../../site-assets/images/gallery/gallery-3.png')"></div>
                              </div>
                              <div class="reorder__card--content">
                                 <div class="">
                                    <h4>Spicy Pani Puri Spicy Pani Puri</h4>
                                    <div class="time">Date : 2025 Sept 11 , 20:00 PM</div>
                                    <div class="price">Price : $145</div>
                                 </div>
                                 <div class="icon"><i class='bx bx-plus'></i></div>
                              </div>
                           </li>
                           <li class="reorder__card">
                              <div class="reorder__card--img">
                                 <div class="image" style="background-image: url('../../site-assets/images/gallery/gallery-3.png')"></div>
                              </div>
                              <div class="reorder__card--content">
                                 <div class="">
                                    <h4>Spicy Pani Puri Spicy Pani Puri</h4>
                                    <div class="time">Date : 2025 Sept 11 , 20:00 PM</div>
                                    <div class="price">Price : $145</div>
                                 </div>
                                 <div class="icon"><i class='bx bx-check'></i></div>
                              </div>
                           </li>
                           <li class="reorder__card">
                              <div class="reorder__card--img">
                                 <div class="image" style="background-image: url('../../site-assets/images/gallery/gallery-3.png')"></div>
                              </div>
                              <div class="reorder__card--content">
                                 <div class="">
                                    <h4>Spicy Pani Puri Spicy Pani Puri</h4>
                                    <div class="time">Date : 2025 Sept 11 , 20:00 PM</div>
                                    <div class="price">Price : $145</div>
                                 </div>
                                 <div class="icon"><i class='bx bx-plus'></i></div>
                              </div>
                           </li>
                           <li class="reorder__card">
                              <div class="reorder__card--img">
                                 <div class="image" style="background-image: url('../../site-assets/images/gallery/gallery-3.png')"></div>
                              </div>
                              <div class="reorder__card--content">
                                 <div class="">
                                    <h4>Spicy Pani Puri Spicy Pani Puri</h4>
                                    <div class="time">Date : 2025 Sept 11 , 20:00 PM</div>
                                    <div class="price">Price : $145</div>
                                 </div>
                                 <div class="icon"><i class='bx bx-check'></i></div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="btn__group">
               <button type="button" class="l__button l__button--secondary next-step">Next Step</button>
            </div>
         </div>

         <div class="step step-2">
            <!-- Step 2 form fields here -->
            <div class="customize">
               <div class="faq">
                  <div class="faq__accordion">
                     <div class="accordion custom__accordion">
                        <div class="accordion__item active">
                           <div class="accordion__item--title" href="javascript:void(0)">
                              <div class="head">
                                 <h4 class="mb-0">Item Name : Spicy Panipuri </h4>
                                 <h5 class="mb-0">Order ID : #12394</h5>
                              </div>
                              <i class="fas fa-chevron-down"></i>
                           </div>
                           <div class="accordion__item--content" style="display: block;">
                              <div class="row">
                                 <div class="col-lg-8">
                                    <div class="box">
                                       <h4>Spice Tolerance</h4>
                                       <ul>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkOne">
                                                <label class="form-check-label" for="checkOne">
                                                   Low
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkTwo">
                                                <label class="form-check-label" for="checkTwo">
                                                   Medium
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkThird">
                                                <label class="form-check-label" for="checkThird">
                                                   High
                                                </label>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="box">
                                       <h4>Meal Type Option</h4>
                                       <ul>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkOne">
                                                <label class="form-check-label" for="checkOne">
                                                   Vegiterian
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkTwo">
                                                <label class="form-check-label" for="checkTwo">
                                                   Non - Veg
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkThird">
                                                <label class="form-check-label" for="checkThird">
                                                   No -Egg
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkFour">
                                                <label class="form-check-label" for="checkThird">
                                                   Vegan Menu
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkFive">
                                                <label class="form-check-label" for="checkThird">
                                                   Gluten Free
                                                </label>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="box">
                                       <h4>Serving Sizes</h4>
                                       <ul>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkOne">
                                                <label class="form-check-label" for="checkOne">
                                                   Small Tray (1-2 Person)
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkTwo">
                                                <label class="form-check-label" for="checkTwo">
                                                   Medium Tray (5 People)
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkThird">
                                                <label class="form-check-label" for="checkThird">
                                                   Family Pack (6-8 People)
                                                </label>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="box">
                                       <h4>Serving Sizes</h4>
                                       <ul>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkOne">
                                                <label class="form-check-label" for="checkOne">
                                                   Small Tray (1-2 Person)
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkTwo">
                                                <label class="form-check-label" for="checkTwo">
                                                   Medium Tray (5 People)
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkThird">
                                                <label class="form-check-label" for="checkThird">
                                                   Family Pack (6-8 People)
                                                </label>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="box">
                                       <h4>Other Options</h4>
                                       <ul>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkOne">
                                                <label class="form-check-label" for="checkOne">
                                                   Option 1
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkTwo">
                                                <label class="form-check-label" for="checkTwo">
                                                   Option 2
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkThird">
                                                <label class="form-check-label" for="checkThird">
                                                   Option 3
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkFour">
                                                <label class="form-check-label" for="checkThird">
                                                   Option 4
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkFive">
                                                <label class="form-check-label" for="checkThird">
                                                   Option 5
                                                </label>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="sidebar">
                                       <h4>Special Requirment</h4>
                                       <p>Any Special Requirement or Allergies ? Leave us a message </p>
                                       <textarea class="form-control" name="" rows="10" id="" placeholder="Message"></textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="accordion__item ">
                           <div class="accordion__item--title" href="javascript:void(0)">
                              <div class="head">
                                 <h4 class="mb-0">Item Name : Spicy Panipuri </h4>
                                 <h5 class="mb-0">Order ID : #12394</h5>
                              </div>
                              <i class="fas fa-chevron-down"></i>
                           </div>
                           <div class="accordion__item--content">
                              <div class="row">
                                 <div class="col-lg-8">
                                    <div class="box">
                                       <h4>Spice Tolerance</h4>
                                       <ul>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkOne">
                                                <label class="form-check-label" for="checkOne">
                                                   Low
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkTwo">
                                                <label class="form-check-label" for="checkTwo">
                                                   Medium
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkThird">
                                                <label class="form-check-label" for="checkThird">
                                                   High
                                                </label>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="box">
                                       <h4>Meal Type Option</h4>
                                       <ul>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkOne">
                                                <label class="form-check-label" for="checkOne">
                                                   Vegiterian
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkTwo">
                                                <label class="form-check-label" for="checkTwo">
                                                   Non - Veg
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkThird">
                                                <label class="form-check-label" for="checkThird">
                                                   No -Egg
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkFour">
                                                <label class="form-check-label" for="checkThird">
                                                   Vegan Menu
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkFive">
                                                <label class="form-check-label" for="checkThird">
                                                   Gluten Free
                                                </label>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="box">
                                       <h4>Serving Sizes</h4>
                                       <ul>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkOne">
                                                <label class="form-check-label" for="checkOne">
                                                   Small Tray (1-2 Person)
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkTwo">
                                                <label class="form-check-label" for="checkTwo">
                                                   Medium Tray (5 People)
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkThird">
                                                <label class="form-check-label" for="checkThird">
                                                   Family Pack (6-8 People)
                                                </label>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="box">
                                       <h4>Serving Sizes</h4>
                                       <ul>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkOne">
                                                <label class="form-check-label" for="checkOne">
                                                   Small Tray (1-2 Person)
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkTwo">
                                                <label class="form-check-label" for="checkTwo">
                                                   Medium Tray (5 People)
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkThird">
                                                <label class="form-check-label" for="checkThird">
                                                   Family Pack (6-8 People)
                                                </label>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="box">
                                       <h4>Other Options</h4>
                                       <ul>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkOne">
                                                <label class="form-check-label" for="checkOne">
                                                   Option 1
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkTwo">
                                                <label class="form-check-label" for="checkTwo">
                                                   Option 2
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkThird">
                                                <label class="form-check-label" for="checkThird">
                                                   Option 3
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkFour">
                                                <label class="form-check-label" for="checkThird">
                                                   Option 4
                                                </label>
                                             </div>
                                          </li>
                                          <li class="item">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioDefault" id="checkFive">
                                                <label class="form-check-label" for="checkThird">
                                                   Option 5
                                                </label>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="sidebar">
                                       <h4>Special Requirment</h4>
                                       <p>Any Special Requirement or Allergies ? Leave us a message </p>
                                       <textarea class="form-control" name="" rows="10" id="" placeholder="Message"></textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
            <div class="btn__group">
               <button type="button" class="l__button l__button--secondary next-step">Next Step</button>
            </div>
         </div>

         <div class="step step-3">
            <!-- Step 3 form fields here -->
            <div class="summary">
               <div class="row">
                  <div class="col-lg-8">
                     @include("site.includes.checkout-list-card")
                  </div>
                  <div class="col-lg-4">
                     <div class="summary__wrapper mt-4 mt-lg-0">
                        <div class="summary__box">
                           <h4>Order Summary</h4>
                           <ul>
                              <li>
                                 <span>Subtotal</span>
                                 <strong>$565</strong>
                              </li>
                              <li>
                                 <span>Discount (-20%)</span>
                                 <strong class="text-danger">-$113</strong>
                              </li>
                              <li>
                                 <span>Delivery Fee</span>
                                 <strong>$15</strong>
                              </li>
                              <li>
                                 <span>Grand Total</span>
                                 <strong>$467 </strong>
                              </li>
                           </ul>
                        </div>
                        <div class="summary__req">
                           <h4>Any Special Delivery Requirement ? </h4>
                           <p>Any Special Requirement ? Leave us a message </p>
                           <textarea name="" id="" class="form-control" rows="10" placeholder="Message"></textarea>
                           <div class="form__group">
                              <div class="icon"><i class='bx bx-purchase-tag-alt'></i></div>
                              <input type="text" class="" placeholder="Add promo code">
                              <button class="l__button l__button--secondary promo-btn">Apply</button>
                           </div>
                           <button class="l__button l__button--primary">Go to Checkout <i class='bx bx-right-arrow-alt'></i></button>
                           <ul class="bank-icon">
                              <li>
                                 <img src="{{ asset ('site-assets/images/icon/visa.png') }}" alt="">
                              </li>
                              <li>
                                 <img src="{{ asset ('site-assets/images/icon/mastercard.png') }}" alt="">
                              </li>
                              <li>
                                 <img src="{{ asset ('site-assets/images/icon/paypal.png') }}" alt="">
                              </li>
                              <li>
                                 <img src="{{ asset ('site-assets/images/icon/apple-pay.png') }}" alt="">
                              </li>
                              <li>
                                 <img src="{{ asset ('site-assets/images/icon/g-pay.png') }}" alt="">
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="btn__group">
               <button type="button" class="l__button l__button--secondary next-step">Next Step</button>
            </div>
         </div>
         <div class="step step-4">
            <!-- Step 4 form fields here -->
            <div class="tracking">
               <div class="container">
                  <div class="section__title text-center">
                     <h5>Thank you for Ordering with Masal House</h5>
                     <h2>Your Order has been Confirmed , here is whats happening behind the scene.</h2>
                  </div>
                  <div class="tracking__box">
                     <h4>Your Journey Starts from here</h4>
                     <div class="tracking__wrapper">
                        <div class="row g-0">
                           <div class="col-6">
                              <div class="tracking__wrapper__card active">
                                 <div class="tracking__wrapper__card--icon">
                                    <img src="{{ asset ('site-assets/images/icon/tracking-1.png') }}" alt="">
                                 </div>
                                 <div class="tracking__wrapper__card--content">
                                    <h5>We are Preparing your Meal </h5>
                                    <h6>Our Chefs are Preparing your oder right now !</h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row g-0">
                           <div class="col-6">
                              <div class="tracking__wrapper__card active">
                                 <div class="tracking__wrapper__card--icon">
                                    <img src="{{ asset ('site-assets/images/icon/tracking-2.png') }}" alt="">
                                 </div>
                                 <div class="tracking__wrapper__card--content">
                                    <h5>We are packing</h5>
                                    <h6>We are packing your meals right now </h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row g-0">
                           <div class="col-6">
                              <div class="tracking__wrapper__card active">
                                 <div class="tracking__wrapper__card--icon">
                                    <img src="{{ asset ('site-assets/images/icon/tracking-3.png') }}" alt="">
                                 </div>
                                 <div class="tracking__wrapper__card--content">
                                    <h5>Your delivery is on the way ! </h5>
                                    <h6>Our Chefs are Preparing your oder right now !</h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row g-0">
                           <div class="col-6">
                              <div class="tracking__wrapper__card">
                                 <div class="tracking__wrapper__card--icon">
                                    <img src="{{ asset ('site-assets/images/icon/tracking-4.png') }}" alt="">
                                 </div>
                                 <div class="tracking__wrapper__card--content">
                                    <h5>Your Order is delivered </h5>
                                    <h6>Our delivery partner is on the way and your order is on your doorway </h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <h5 class="mt-4">Thank you , Enjoy your Meal ! </h5>
                  </div>
               </div>
            </div>
            <div class="btn__group">
               <button type="button" class="l__button l__button--secondary">Submnit</button>
            </div>
         </div>
      </form>
   </div>
</section>


<div class="container-fluid">
   <div class="subscribe">
      <div class="row">
         <div class="col-lg-8 col-xl-9">
            <h2>STAY UPTO DATE ABOUT OUR LATEST OFFERS</h2>
         </div>
         <div class="col-lg-4 col-xl-3">
            <form action="">
               <div class="icon"><i class='bx bx-envelope'></i></div>
               <input type="text" placeholder="Enter your email address">
               <button class="l__button l__button--secondary">Subscribe to Newsletter</button>
            </form>
         </div>
      </div>
   </div>
</div>


@endsection

@push('footer')
<!-- multi-step form script -->
<script>
   var currentStep = 1;
   var updateProgressBar;

   function displayStep(stepNumber) {
      if (stepNumber >= 1 && stepNumber <= 4) {
         $(".step-" + currentStep).hide();
         $(".step-" + stepNumber).show();
         currentStep = stepNumber;
         updateProgressBar();
         updateStepCircles();
      }
   }

   $(document).ready(function() {
      $('#multi-step-form').find('.step').slice(1).hide();

      $(".next-step").click(function() {
         if (currentStep < 4) {
            $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
            currentStep++;
            setTimeout(function() {
               $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
               $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
               updateProgressBar();
               updateStepCircles();
            }, 500);
         }
      });

      $(".prev-step").click(function() {
         if (currentStep > 1) {
            $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
            currentStep--;
            setTimeout(function() {
               $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
               $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
               updateProgressBar();
               updateStepCircles();
            }, 500);
         }
      });

      updateProgressBar = function() {
         var progressPercentage = Math.min((currentStep - 1) * 31, 100);
         $(".progress-bar").css("width", progressPercentage + "%");
      }


      function updateStepCircles() {
         $(".step-box").removeClass("active");
         $(".step-box").each(function(index) {
            if (index + 1 <= currentStep) {
               $(this).addClass("active");
            }
         });
      }
   });
</script>

<!-- quantity script -->
<script>
   (function() {
      "use strict";

      var jQueryPlugin = (window.jQueryPlugin = function(ident, func) {
         return function(arg) {
            if (this.length > 1) {
               this.each(function() {
                  var $this = $(this);

                  if (!$this.data(ident)) {
                     $this.data(ident, func($this, arg));
                  }
               });

               return this;
            } else if (this.length === 1) {
               if (!this.data(ident)) {
                  this.data(ident, func(this, arg));
               }

               return this.data(ident);
            }
         };
      });

      // Quantity control function
      function Guantity($root) {
         const element = $root;
         const quantity_target = $root.find("[data-quantity-target]");
         const quantity_minus = $root.find("[data-quantity-minus]");
         const quantity_plus = $root.find("[data-quantity-plus]");
         const min = parseInt(quantity_target.attr("min")) || 1;
         const max = parseInt(quantity_target.attr("max")) || Infinity;

         // Initialize quantity_ from input value
         var quantity_ = parseInt(quantity_target.val()) || min;

         $(quantity_minus).click(function() {
            if (quantity_ > min) {
               quantity_--;
               quantity_target.val(quantity_);
            }
         });

         $(quantity_plus).click(function() {
            if (quantity_ < max) {
               quantity_++;
               quantity_target.val(quantity_);
            }
         });

         // Optional: update quantity_ if user manually changes input
         quantity_target.on("input", function() {
            let val = parseInt($(this).val());
            if (isNaN(val) || val < min) {
               val = min;
            } else if (val > max) {
               val = max;
            }
            quantity_ = val;
            $(this).val(quantity_);
         });
      }

      $.fn.Guantity = jQueryPlugin("Guantity", Guantity);
      $("[data-quantity]").Guantity();
   })();
</script>
@endpush