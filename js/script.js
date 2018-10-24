
var numIdContacto=1;

function agregarContacto(){
    var aggInput = document.getElementById("formularioCliente");
    var mybr = document.createElement('br');


    numIdContacto++;

    var inputName = document.createElement("INPUT");         
    inputName.type = 'text';
    inputName.name = 'nombreContacto[]';
    inputName.placeholder = 'Nombre';

    var inputEmail = document.createElement("INPUT");         
    inputEmail.type = 'text';
    inputEmail.name = 'nombreCorreo[]';
    inputEmail.placeholder = 'Correo';

    var inputTelefono = document.createElement("INPUT");         
    inputTelefono.type = 'text';
    inputTelefono.name = 'nombreTelefono[]';
    inputTelefono.placeholder = 'Telefono';

    aggInput.appendChild(inputName);
    aggInput.appendChild(inputEmail);
    aggInput.appendChild(inputTelefono);
    aggInput.appendChild(mybr);
}

