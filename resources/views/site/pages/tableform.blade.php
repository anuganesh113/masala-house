@push('header')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.2/themes/base/jquery-ui.css">


<!-- <style>
    @media (max-width: 500px) {
        .seletimemob {
            position: absolute;
            left: 105px;
            top: 56%;
            transform: translateY(-50%);
            pointer-events: none;
            color: gray;
            opacity: 0.7;
        }

        .selectdatemob {
            position: absolute;
            left: 105px;
            top: 45%;
            transform: translateY(-50%);
            pointer-events: none;
            color: gray;
            opacity: 0.7;
        }

    }
</style> -->
@endpush

<section class="reservation">
    <div class="reservation__box">
        <div class="row">
            <div class="col-md-8 mb-5 mb-lg-0">
                <h2>Make a Table Reservation</h2>
                <p>Explore our most Exquisite Indian Menu</p>
                <form action="{{ route('site.table.book') }}" class="form contactpageform" method="post">
                    @csrf
                    <input type="hidden" class="form-control" name="table[booked]" value="Table Book Reservation Inquire" placeholder="Your Full name">

                    <div class="row g-4">
                        <div class="col-lg-4 mt-5">
                            <div class="form__group ">
                                <input type="text" name="table[name]" placeholder=" Your Full Name" required>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <div class="form__group">
                                <input type="email" name="table[email]" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <div class="form__group"><span class="invalid-feedback phone-error"> Please enter a valid 10-digit US phone number</span>

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
                            <div class="form__group" style="display: flex;">

                                <input type="text" name="table[date]" placeholder="Select Date" required id="datepicker"  value="{{ now()->toDateString() }}">
                                <i class="fas fa-calendar" style="border-bottom: 1px solid;"></i>
                                <!-- <input type="date" name="table[date]" style="min-width:98%;width:100%" class="datepicker-field" placeholder="Select date" required onkeydown="return false" value="{{ now()->toDateString() }}"> -->

                                <!-- <span class="selectdatemob" >Select Date</span> -->
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <div class="form__group" style="display: flex;">
                                <input type="time" name="table[time]" id="currentTimeInput" style="min-width:98%;width:100%" placeholder="Select time" required
                                    onfocus="this.showPicker?.()" title="Select time" value="" onkeydown="return false">

                                <!-- <span class="seletimemob" >Select time</span> -->
                                <!-- <i class="fas fa-clock" style="border-bottom: 1px solid;position: relative;right: 18px;"></i> -->

                                <!-- <input type="text" name="table[time]" id="timepicker" placeholder="Select time" required  onkeydown="return false">
                                <i class="fas fa-clock" style="border-bottom: 1px solid;"></i> -->
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <div class="form__group"><span class="text-danger small no_person"></span>
                                <input type="number" max="100" min="1" class="checknumberper" name="table[persons]" placeholder="Number of Persons" required>

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
<script src="https://code.jquery.com/ui/1.14.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('#timepicker').timepicker({
            timeFormat: 'h:mm p', // 12-hour format (e.g., 3:30 PM)
            interval: 1, // 30 min step
            // minTime: '12:00am',
            // maxTime: '12:00pm',
            defaultTime: 'now',
            // startTime: '10:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
    });
</script>
<script>
    $(function() {
        $("#datepicker").datepicker({
            minDate: new Date()
        });
        $("#datepicker").attr('readOnly', 'true');
    });
</script>


<script>
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    document.getElementById('currentTimeInput').value = `${hours}:${minutes}`;
</script>
@endpush