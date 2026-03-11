<section class="reservation">
    <div class="reservation__box">
        <div class="row">
            <div class="col-md-8 mb-5 mb-lg-0">
                <h2>Make a Table Reservation</h2>
                <p>Explore our most Exquisite Indian Menu</p>
                <form action="{{ route('site.table.book') }}" class="form contactpageform" method="post">
                    @csrf
               <input type="hidden" class="form-control" name="table[booked]" value="Table Book Reservation Inquire"  placeholder="Your Full name" >

                    <div class="row g-4">
                        <div class="col-lg-4 mt-5">
                            <div class="form__group ">
                                <input type="text" name="table[name]" placeholder="Full Name" required>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <div class="form__group">
                                <input type="email" name="table[email]" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <div class="form__group"><span class="invalid-feedback phone-error">  Please enter a valid 10-digit US phone number</span>
                                
                         <input type="tel"

                        name="table[phone]"
                        class="checkphone phone contactpage"
                        placeholder="Phone Number"
                        inputmode="numeric"
                        required>

                                <!-- <input type="tel" name="phone" placeholder="Phone Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required> -->
                            </div>
                        </div>
                     <div class="col-lg-4 mt-5">
                        <div class="form__group">
                           
                            <input type="date" name="table[date]" class="datepicker-field" placeholder="Select date" required>
                        </div>
                     </div>
                     <div class="col-lg-4 mt-5">
                        <div class="form__group">
                           
                            <input type="time" name="table[time]" placeholder="Select time" required>
                        </div>
                     </div>
                     <div class="col-lg-4 mt-5">
                        <div class="form__group">
                            <input type="number" max="100" min="1" class="checknumberper" name="table[persons]" placeholder="Number of persons">
                           
                        </div>
                     </div>


                        <div class="col-lg-12">
                            <div class="form__group">
                                <textarea rows="1" placeholder="Message" name="table[message]" id=""></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 reservationbtn">
                            <button type="submit" class="l__button l__button--primary ">Make a Reservation</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="reservation__img reservationimg">
                    <img src="{{ asset('site-assets/images/reservation.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>







@push('footer')

@include('_helpers._valiadtion')


@endpush