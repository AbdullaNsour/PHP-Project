

const names = document.getElementById('first_name')
const last = document.getElementById('last_name')
const form = document.getElementById('form')
const errorElement = document.getElementById('error_name')


form.addEventListener('submit',(e) =>{
    let messages = []
    if (names.value === '' || names.value == null){
        messages.push('name or last name is required')
    }
    if(password.length <= 6 ){
    messages.push ('pasword must be longer than 6 characters')}

    if(password.length > 20 ){
    messages.push ('pasword to long')}


    if(messages.length > 0){
    e.preventDefault()
    errorElement.innerText = messages.join(', ')}
})


