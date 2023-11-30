
//------------------------------------Menu-item-------------------
const toP = document.querySelector(".top")
window.addEventListener("scroll",function(){
    // . Nó trả về một số nguyên đại diện cho vị trí cuộn hiện tại của trang web theo đơn vị pixel.
    const X = this.pageYOffset;
  if(X>1){toP.classList.add("active")}
  else {
      toP.classList.remove("active")
  }
})
// //------------------------------------Menu-SLIDEBAR-CARTEGORY-------------------
    // const itemSlidebar = document.querySelectorAll(".cartegory-left-li")
    // itemSlidebar.forEach(function(menu,index){
    //     menu.addEventListener("click",function(){
    //         menu.classList.toggle("block")
    //     })
    // })
