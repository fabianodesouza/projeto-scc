
    function search() {

        let pesquisa = document.getElementById('pesquisar').value

        // console.log(pesquisa)

        location=`home_pesq.php?pesq=${pesquisa}`
    
    
    }

    const password = document.getElementById('senha')
    const icon =document.getElementById('icon')
    
    function showHidden() {

        if(password.type === 'password') {

           password.setAttribute('type','text')
            icon.classList.add('hidden')

        }else {

            password.setAttribute('type','password')
            icon.classList.remove('hidden')
        }

    }
