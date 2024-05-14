// this is for main page

let attractiveImg= document.getElementById('attraction-img');
const ImglistPaths = ['assets/homepage/pic3.jpg',
                    'assets/homepage/pic4.jpg',
                    'assets/homepage/pic6.jpg'
                    ]
let i =0;
setInterval(changeAttractImg, 5000);
function changeAttractImg(){
    attractiveImg.src= ImglistPaths[(i++)%ImglistPaths.length];
}

// carousel
let items = document.querySelectorAll('.carousel .carousel-item')

      items.forEach((el) => {
          const minPerSlide = 4
          let next = el.nextElementSibling
          for (var i=1; i<minPerSlide; i++) {
              if (!next) {
                  // wrap carousel by using first child
                next = items[0]
              }
              let cloneChild = next.cloneNode(true)
              el.appendChild(cloneChild.children[0])
              next = next.nextElementSibling
          }
      })

//