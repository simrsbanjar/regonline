// file js untuk nge slide 
    $(document).ready(function(){
        $('.slidercuy').slick({
        dots: true,
        autoplay: true,
        autoplaySpeed: 2500,
        adaptiveHeight: true,
        slidesToShow: 1,
        slidesToScroll:1,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 800,
              settings: {
                dots: false,
                slidesToShow: 1,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 600,
              settings: {
                dots: false,
                slidesToShow: 1,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                dots:true,
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
        });
    });

  //   $(document).ready(function(){
  //     $('.slidercuy').slick({
  //     dots: true,
  //     autoplay: true,
  //     autoplaySpeed: 2500,
  //     slidesToShow: 6,
  //     slidesToScroll:1,
  //     responsive: [
  //         {
  //           breakpoint: 1024,
  //           settings: {
  //             slidesToShow: 4,
  //             slidesToScroll: 4,
  //             infinite: true,
  //             dots: true
  //           }
  //         },
  //         {
  //           breakpoint: 600,
  //           settings: {
  //             dots: false,
  //             slidesToShow: 3,
  //             slidesToScroll: 3
  //           }
  //         },
  //         {
  //           breakpoint: 480,
  //           settings: {
  //             dots:false,
  //             slidesToShow: 2,
  //             slidesToScroll: 2
  //           }
  //         }
  //         // You can unslick at a given breakpoint now by adding:
  //         // settings: "unslick"
  //         // instead of a settings object
  //       ]
  //     });
  // });