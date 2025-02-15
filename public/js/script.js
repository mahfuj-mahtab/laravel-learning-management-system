article_section = document.getElementById("all_article_section_")
quiz_section = document.getElementById("all_quiz_section_")
course_section = document.getElementById("all_course_section_")


article_li = document.getElementById("article_li")
quiz_li = document.getElementById("quiz_li")
course_li = document.getElementById("course_li")

article_li.addEventListener('click',()=>{
    article_section.classList.remove("hide")
    quiz_li.classList.remove("quiz_li")
    course_li.classList.remove("course_li")
    article_section.classList.add("show")
    article_li.classList.add("article_li")
    quiz_section.classList.add("hide")
    course_section.classList.add("hide")
})
quiz_li.addEventListener('click',()=>{
    quiz_section.classList.remove("hide")
    quiz_section.classList.add("show")
    quiz_li.classList.add("quiz_li")
    article_section.classList.add("hide")
    course_section.classList.add("hide")
    article_li.classList.remove("article_li")
    course_li.classList.remove("course_li")
})
course_li.addEventListener('click',()=>{
    course_section.classList.remove("hide")
    course_section.classList.add("show")
    course_li.classList.add("course_li")
    quiz_section.classList.add("hide")
    article_section.classList.add("hide")
    article_li.classList.remove("article_li")
    quiz_li.classList.remove("quiz_li")
})

let scrollContainer = document.querySelector("#regular_middle_course_box_section")
let left_btn = document.querySelector("#left_btn")
let right_btn = document.querySelector("#right_btn")
scrollContainer.addEventListener('wheel', (e)=>{
    e.preventDefault()

    scrollContainer.scrollLeft += e.deltaY
})
left_btn.addEventListener('click', (e)=>{
    e.preventDefault()
    scrollContainer.scrollLeft -= 400
})
right_btn.addEventListener('click', (e)=>{
    e.preventDefault()    
    scrollContainer.scrollLeft += 400
 
})
let livescrollContainer = document.querySelector("#live_middle_course_box_section")
let liveleft_btn = document.querySelector("#liveleft_btn")
let liveright_btn = document.querySelector("#liveright_btn")
livescrollContainer.addEventListener('wheel', (e)=>{
    e.preventDefault()
    livescrollContainer.scrollLeft += e.deltaY
})
liveleft_btn.addEventListener('click', (e)=>{
    e.preventDefault()
    livescrollContainer.scrollLeft -= 400
})
liveright_btn.addEventListener('click', (e)=>{
    e.preventDefault()    
    livescrollContainer.scrollLeft += 400
 
})
article_section = document.getElementById("all_article_section_")
quiz_section = document.getElementById("all_quiz_section_")
course_section = document.getElementById("all_course_section_")

var course_boxs = document.getElementsByClassName("course_section");
var course_boxs_top = document.getElementsByClassName("course_section_top");
var bottom_course_box = document.getElementsByClassName("course_section_bottom");



// 



for (var i = 0; i < course_boxs.length; i++) {
    // Use an IIFE (Immediately Invoked Function Expression) to capture the correct value of 'i'
    (function(index) {
        course_boxs[index].addEventListener('click', function(e) {
            e.preventDefault();
            // Toggle the 'active' class for the corresponding bottom course box
            if (bottom_course_box[index]) {
                course_boxs_top[index].classList.toggle("clicked")
                bottom_course_box[index].classList.toggle('active');
            }
        });
    })(i);
}





article_li = document.getElementById("article_li")
quiz_li = document.getElementById("quiz_li")
course_li = document.getElementById("course_li")
article_li.addEventListener('click',()=>{
    article_section.classList.remove("hide")
    quiz_li.classList.remove("quiz_li")
    course_li.classList.remove("course_li")
    article_section.classList.add("show")
    article_li.classList.add("article_li")
    quiz_section.classList.add("hide")
    course_section.classList.add("hide")
})
quiz_li.addEventListener('click',()=>{
    quiz_section.classList.remove("hide")
    quiz_section.classList.add("show")
    quiz_li.classList.add("quiz_li")
    article_section.classList.add("hide")
    course_section.classList.add("hide")
    article_li.classList.remove("article_li")
    course_li.classList.remove("course_li")
})
course_li.addEventListener('click',()=>{
    course_section.classList.remove("hide")
    course_section.classList.add("show")
    course_li.classList.add("course_li")
    quiz_section.classList.add("hide")
    article_section.classList.add("hide")
    article_li.classList.remove("article_li")
    quiz_li.classList.remove("quiz_li")
})


