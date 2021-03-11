const url = "http://localhost:8888/config/traitement.php"
const urlSession = "http://localhost:8888/config/session.php"
const messagesbloc = document.getElementById("space")
let userConnect =document.getElementById("userConnect").textContent

const getMessages= function(){
fetch(url)
.then(response=>response.json())
.then(data =>{
    messagesbloc.innerHTML=""
    data.forEach(message => {
        if(message["username"] !== userConnect){
            messagesbloc.insertAdjacentHTML("afterbegin", `<li class='left'><span class='userStyle'>${message["username"]}</span><br>${message["content"]}</li>`)
        }else{
            messagesbloc.insertAdjacentHTML("afterbegin", `<li class='right'><span class='userStyle'>${message["username"]}</span><br>${message["content"]}</li>`)

        }
    });
    
})    
} 

getMessages()
setInterval(getMessages, 2000)

