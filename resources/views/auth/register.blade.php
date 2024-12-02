<style>
    /* Estilos generales para el formulario */
form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Estilo de las etiquetas */
form label {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
    color: #333;
}

/* Estilo para los campos de entrada */
form input[type="text"], 
form input[type="email"], 
form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}

/* Estilo para el botón de envío */
form button {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
}

/* Efecto hover para el botón */
form button:hover {
    background-color: #0056b3;
}

/* Estilo para el contenedor de cada campo */
form div {
    margin-bottom: 15px;
}

/* Estilo para los mensajes de error */
form .error {
    color: red;
    font-size: 12px;
    margin-top: 5px;
}

/* Estilo del formulario al estar en estado "activo" (cuando se hace foco en los inputs) */
form input:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

</style>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div>
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" value="{{ old('Nombre') }}" required>
    </div>
    <div>
        <label for="Email">Correo Electrónico:</label>
        <input type="email" id="Email" name="Email" value="{{ old('Email') }}" required>
    </div>
    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>
    <div>
        <label for="Rol">Rol:</label>
        <input type="text" id="Rol" name="Rol" value="{{ old('Rol') }}" required>
    </div>
    <button type="submit">Registrar</button>
</form>
