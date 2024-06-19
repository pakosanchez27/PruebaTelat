document.addEventListener('DOMContentLoaded', function() {
   
    
    // obtener el cp 
    const codigoPostalInput = document.querySelector('#codigoPostal');
    
    codigoPostalInput.addEventListener('blur', function() {


        const coloniaInput = document.querySelector('#colonia');
        const municipioInput = document.querySelector('#ciudad');
        const estadoInput = document.querySelector('#estado');

        // validar el codigo postal
        const $codigoPostal = this.value;
        
        console.log($codigoPostal);

        const metodo = 'info_cp';
        const busqueda = $codigoPostal;
        const token = '78209996-4511-4124-b6bf-2593fba93f9f';
        const variable = 'GET';



         // fetch a la api 
    const apiUrl = `https://api.copomex.com/query/${metodo}/${busqueda}?=${variable}&token=pruebas `;
    
    fetch(apiUrl)
       .then(response => response.json())
       .then(data => {
        console.log(data[0].response);

            coloniaInput.value = data[0].response.asentamiento;
            municipioInput.value = data[0].response.municipio;
            estadoInput.value = data[0].response.estado;
            
       })


    });
   

   

});