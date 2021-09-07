const apiKey = "aee9c280a62595241423e04a067bc3ce";
//https://api.themoviedb.org/3/genre/movie/list?api_key=aee9c280a62595241423e04a067bc3ce&language=en-US

//SHOW MOVIE CARD



function openCard() {
  document.getElementById("res-card").style.display = "grid";
}

function closeCard() {
  document.getElementById("res-card").style.display = "none";
}

//CHANGE BG COLOR



function changeColor() {
  //var a = document.getElementsByClassName("body");
  //a[0].classList.toggle("light")
  if (document.body.className === "dark"){
    document.body.className = "light";
  } else {
    document.body.className = "dark";
  }
    //document.body.style.background.classlist.toggle("light")

    
}  


function titleIncrease() {
  if (document.getElementById("demoText").style.fontSize === "16px"){
    document.getElementById("demoText").style.fontSize = "20px"
  } else {
    document.getElementById("demoText").style.fontSize = "16px"
  }
}








