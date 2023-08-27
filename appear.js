document.onkeydown = function(e){
    if(e.key=="Enter"){
        e.preventDefault()
    }
}

function appear(i){
    if(document.getElementById(`email${i}`).value && document.getElementById(`name${i}`).value){
        document.getElementById(`name${i+1}` ).style.visibility = "visible"
        document.getElementById(`email${i+1}`).style.visibility = "visible"
        document.getElementById(`name${i+1}` ).style.height = "10vh"
        document.getElementById(`email${i+1}`).style.height = "10vh"
        if(i>=3){
            document.getElementById('register').style.display = 'inline'
            document.getElementById('edit').style.display = 'inline'
            
        }
    }
}
for(var i=1;i<5;i++){
    document.getElementById(`email${i}`).i = i
    document.getElementById(`name${i}`).i = i
    document.getElementById(`name${i}`).onkeydown = document.getElementById(`email${i}`).onkeydown = function(e){
        if(e.key!="Enter"){return;}
        i = e.target.i
        appear(i)
    }
    document.getElementById(`name${i}`).onchange = document.getElementById(`email${i}`).onchange = function(e){
        i = e.target.i
        appear(i)
    }
}

document.getElementsByName(`Password`)[0].onchange = function(e){
    if(e.target.value){
        document.getElementById(`name1` ).style.visibility = "visible"
        document.getElementById(`email1`).style.visibility = "visible"
        document.getElementById(`name1` ).style.height = "10vh"
        document.getElementById(`email1`).style.height = "10vh"
    }
}
document.getElementsByName(`Password`)[0].onkeydown = function(e){
    if(e.key!="Enter"){return;}
    if(e.target.value){
        document.getElementById(`name1` ).style.visibility = "visible"
        document.getElementById(`email1`).style.visibility = "visible"
        document.getElementById(`name1` ).style.height = "10vh"
        document.getElementById(`email1`).style.height = "10vh"
    }
}
document.getElementsByName(`team`)[0].style.height = "10vh"
document.getElementsByName(`team`)[0].style.visibility = "visible"
document.getElementsByName(`Password`)[0].style.visibility = "hidden"
document.getElementsByName(`team`)[0].onchange = function(e){
    if(e.target.value){
        document.getElementsByName(`Password`)[0].style.visibility = "visible"
        document.getElementsByName(`Password`)[0].style.height = "10vh"
    }
}
document.getElementsByName(`team`)[0].onkeydown = function(e){
    if(e.key!="Enter"){return;}
    if(e.target.value){
        document.getElementsByName(`Password`)[0].style.visibility = "visible"
        document.getElementsByName(`Password`)[0].style.height = "10vh"
    }
}
