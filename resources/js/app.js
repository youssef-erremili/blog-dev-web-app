// import './bootstrap';

// let tag_input = document.getElementById('tag-input')
// let tag_container = document.getElementById('tag-container')
// let alertMsg = document.getElementById('msg')
// let tagname = 1

// if (tag_input) {
//     tag_input.addEventListener('keypress', (event) => {
//         if (event.key === 'Enter') {
//             event.preventDefault()
//             let value = tag_input.value.trim() //== "" ? tag_input.value.trim() : ''
//             let tag = document.createElement('input')
//             tag.value = `#${value}`
//             tag.type = "text"
//             tag.name = `tag${tagname++}`
//             tag.classList.add('removetag', 'text-slate-950', 'py-1', 'mx-1', 'px-1', 'w-[5.5rem]', 'inline-block', 'outline-none', 'cursor-pointer', 'select-none', 'rounded-md', 'font-medium', 'capitalize', 'text-center', 'text-sm', 'bg-yellow-400')
//             tag.setAttribute('readonly', 'true')
//             tag_input.value = ""
//             tag_container.appendChild(tag)
//             if (tag_container.childElementCount === 5) {
//                 tag_input.setAttribute('disabled', 'true')
//                 tag_input.setAttribute('placeholder', '')
//                 alertMsg.textContent = "You've reached the maximum allowed tags per topic."
//             }
//             let removetag = document.querySelectorAll('.removetag')
//             removetag.forEach(element => {
//                 element.addEventListener('dblclick', () => {
//                     element.remove()
//                     let count = tag_container.childElementCount
//                     if (count < 5) {
//                         tag_input.removeAttribute('disabled')
//                         tag_input.setAttribute('placeholder', 'Type Your Blog Tags')
//                         alertMsg.textContent = "Each topic can have up to five tags. Get creative!"
//                     }
//                 })
//             });
//         }
//     })
// }

// Get references to the input element and the image tag
const fileInput = document.getElementById('profile_picture');
const imagePreview = document.getElementById('imagePreview');

fileInput.addEventListener('change', function (event) {
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.src = e.target.result;
            // imagePreview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
});




document.getElementById("addLinkButton").addEventListener("click", function () {
    const section = document.querySelector("#container");
    // Create new input elements
    const newInput1 = document.createElement("input");
    newInput1.type = "text";
    newInput1.name = "socialProfile";
    newInput1.classList.add("block", "w-full", "h-11", "my-2","px-5", "py-2.5", "shadow-xs", "text-gray-900", "bg-transparent", "border-[1.3px]", "border-slate-300", "rounded-md", "placeholder-gray-400", "focus:outline-none", "focus:ring-2", "focus:border-white", "ring-blue-600", "placeholder:text-sm");
    newInput1.placeholder = "Link to social profile";

    // Append the new inputs to the section
    section.appendChild(newInput1);
});
