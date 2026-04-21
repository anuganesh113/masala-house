
<div class="faq">
   <div class="faq__accordion">
      <div class="accordion custom__accordion">
   @if( $event->eventfaqs->isNotEmpty())
      @foreach($event->eventfaqs as $faq)
         <div class="accordion__item  ">
            <div class="accordion__item--title" href="javascript:void(0)">
               {{ $faq->question ?? '' }}
               <i class="fas fa-chevron-down"></i>
            </div>
            <div class="accordion__item--content">
               <div>
                  <p>{!! $faq->answer ?? '' !!}</p>
               </div>
            </div>
         </div>
         @endforeach

         @else
         <div class="accordion__item  ">
            <div class="accordion__item--title" href="javascript:void(0)">
             "No FAQs available for this event"
               <i class="fas fa-chevron-down"></i>
            </div>
            <div class="accordion__item--content">
               <div>
                  <p> "No FAQs available for this event"</p>
               </div>
            </div>
         </div>
         @endif

   
      </div>
   </div>
</div>