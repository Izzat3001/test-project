$(document).ready(function () {
  const owl = $("#photo--slider");
  owl.owlCarousel({
       items: 1,
       loop: true,
       margin: 0,
       center: true
   });

   const prev = $('#slider__prev');
   const next = $('#slider__next');

   prev.click(function () {
       owl.trigger('prev.owl.carousel', [500]);
   });

   next.click(function () {
       owl.trigger('next.owl.carousel', [500])
   });
});
