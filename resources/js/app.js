// Get references to the input element and the image tag
const fileInput = document.getElementById('profile_picture');
const imagePreview = document.getElementById('imagePreview');

if (fileInput) {
    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
}




// document.getElementById("addLinkButton").addEventListener("click", function () {
//     const section = document.querySelector("#container");
//     // Create new input elements
//     const newInput1 = document.createElement("input");
//     newInput1.type = "text";
//     newInput1.name = "socialProfile";
//     newInput1.classList.add("block", "w-full", "h-11", "my-2", "px-5", "py-2.5", "shadow-xs", "text-gray-900", "bg-transparent", "border-[1.3px]", "border-slate-300", "rounded-md", "placeholder-gray-400", "focus:outline-none", "focus:ring-2", "focus:border-white", "ring-blue-600", "placeholder:text-sm");
//     newInput1.placeholder = "Link to social profile";

//     // Append the new inputs to the section
//     section.appendChild(newInput1);
// });


let toggle_password = document.getElementById('toggle-password')
let password = document.querySelectorAll('.password-show')

if (toggle_password) {
    toggle_password.addEventListener('click', () => {
        password.forEach(pass => {
            if (pass.type === "password") {
                pass.type = "text"
            } else {
                pass.type = "password"
            }
        })
    })
}

const categories = {
    "categories": [
        { "name": "Technology" },
        { "name": "Health" },
        { "name": "Business" },
        { "name": "Lifestyle" },
        { "name": "Personal Development" },
        { "name": "Art" },
        { "name": "Travel" },
        { "name": "Education" },
        { "name": "Finance" },
        { "name": "Food" },
        { "name": "Politics" },
        { "name": "Science" },
        { "name": "Entertainment" },
        { "name": "Sports" },
        { "name": "Culture" },
        { "name": "Design" },
    ]
};

function populateCategories() {
    const dropdown = document.getElementById('category');
    if (dropdown) {
        categories.categories.forEach(category => {
            const option = document.createElement('option');
            option.value = category.name;
            option.textContent = category.name;
            dropdown.appendChild(option);
        });
    }
}
// Populate categories when the page loads
window.onload = populateCategories;


// hide alert message onclick

let hideBtn = document.querySelectorAll('.hide')
let alerts = document.querySelectorAll('.animate')
if (hideBtn) {
    hideBtn.forEach(hide => {
        hide.addEventListener('click', () => {
            alerts.forEach(alert => {
                alert.classList.add('hidden')
            })
        })
    });
}


const category = ["Technology", 
                "Health", 
                "Business", 
                "Lifestyle", 
                "Personal Development", 
                "Art", 
                "Travel", 
                "Education", 
                "Finance", 
                "Food", 
                "Politics", 
                "Science", 
                "Entertainment", 
                "Sports", 
                "Culture", 
                "Design"
            ]

const BgColor = ["red", 
                "green", 
                "#344CB7", 
                "#16C47F", 
                "#344CB7", 
                "#22c55e", 
                "#09122C", 
                "yellow", 
                "#4635B1", 
                "#2973B2", 
                "#344CB7", 
                "#F14A00", 
                "#F93827", 
                "#FF9D23", 
                "lightsalmon", 
                "chartreuse"
            ]

const categoryColorMap = {};

// Populate the categoryColorMap
category.forEach((cat, index) => {
    categoryColorMap[cat] = BgColor[index];
});

// Function to apply background color to spans based on their category
function applyCategoryColors() {
    let spans = document.querySelectorAll('.category');

    spans.forEach(span => {
        const categoryName = span.textContent.trim();  // Get the category name from the span's text
        if (categoryColorMap[categoryName]) {
            span.style.backgroundColor = categoryColorMap[categoryName];  // Apply the corresponding color
        }
    });
}

// Call the function to apply the background colors
applyCategoryColors();
console.log(categoryColorMap)