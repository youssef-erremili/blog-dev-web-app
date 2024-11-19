// import './bootstrap';

let tag_input = document.getElementById('tag-input')
let tag_container = document.getElementById('tag-container')
let alertMsg = document.getElementById('msg')
let tagname = 1

tag_input.addEventListener('keypress', (event) => {
    if (event.key === 'Enter') {
        event.preventDefault()
        let value = tag_input.value.trim() //== "" ? tag_input.value.trim() : ''
        let tag = document.createElement('input')
        tag.value = `#${value}`
        tag.type = "text"
        tag.name = `tag${tagname++}`
        tag.classList.add('removetag', 'text-slate-950', 'py-1', 'mx-1','px-1', 'w-[5.5rem]', 'inline-block', 'outline-none', 'cursor-pointer', 'select-none', 'rounded-md', 'font-medium', 'capitalize', 'text-center', 'text-sm', 'bg-yellow-400')
        tag.setAttribute('readonly', 'true')
        tag_input.value = ""
        tag_container.appendChild(tag)
        if (tag_container.childElementCount === 5) {
            tag_input.setAttribute('disabled', 'true')
            tag_input.setAttribute('placeholder', '')
            alertMsg.textContent = "You've reached the maximum allowed tags per topic."
        }
        let removetag = document.querySelectorAll('.removetag')
        removetag.forEach(element => {
            element.addEventListener('dblclick', () => {
                element.remove()
                let count = tag_container.childElementCount
                if (count < 5) {
                    tag_input.removeAttribute('disabled')
                    tag_input.setAttribute('placeholder', 'Type Your Blog Tags')
                    alertMsg.textContent = "Each topic can have up to five tags. Get creative!"
                }
            })
        });
    }
})