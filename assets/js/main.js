document.querySelector('.signIn').addEventListener('click', ()=>{
    document.querySelector('.login').classList.toggle("active");
})

var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
