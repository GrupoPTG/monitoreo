var numIdContacto = 1;

function agregarContacto() {

    var aggInput = document.getElementById("formularioCliente");
    var mybr = document.createElement('br');



    numIdContacto++;

    var inputName = document.createElement("INPUT");
    inputName.type = 'text';
    inputName.name = 'nombreContacto[]';
    inputName.placeholder = 'Nombre';
    inputName.className = "box1 form-control";

    var inputEmail = document.createElement("INPUT");
    inputEmail.type = 'text';
    inputEmail.name = 'nombreCorreo[]';
    inputEmail.placeholder = 'Correo';
    inputEmail.className = "box2 form-control";

    var inputTelefono = document.createElement("INPUT");
    inputTelefono.type = 'text';
    inputTelefono.name = 'nombreTelefono[]';
    inputTelefono.placeholder = 'Telefono';
    inputTelefono.className = "box2 form-control";

    var inputCargo = document.createElement("INPUT");
    inputCargo.type = 'text';
    inputCargo.name = 'cargo[]';
    inputCargo.placeholder = 'Cargo';
    inputCargo.className = "box2 form-control";


    aggInput.appendChild(inputName);
    aggInput.appendChild(inputEmail);
    aggInput.appendChild(inputTelefono);
    aggInput.appendChild(inputCargo);
    aggInput.appendChild(mybr);
}