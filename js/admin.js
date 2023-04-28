let label = document.getElementById("label-img").value
let text = document.getElementById("input-text").value = "text"
let textarea = document.getElementById("input-textarea").value
let add = document.getElementById("add")
add.addEventListener("click",  (e) => {
    e.preventDefault()
    console.log(label , "img")
    console.log(text , "text")
    console.log(textarea , "textarea")

})
console.log(label)
console.log(text)
console.log(textarea)
console.log(add)