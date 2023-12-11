<script>
    function validaRut(){
        var arut = new Array(8);
        var i, j, dv;
        if ((document.getElementById("rut").value.length) = 0 ){
            alert("Debe ingresar un Número valido");
        } else {
            for (i = 1; i < 9 ; i++){
                arut[i]=0;
            }
            i = 0;
            for(j = (9 -(document.getElementById("rut").value.length)); j<9; j++){
                if((document.getElementById("rut").value.substr(i, 1) >= 0) & (document.getElementById("rut").value.substr(i, 1) <=9)) {
                    arut[j] = document.getElementById("rut").value.substr(i, 1);
                    i++;
                } else {
                    alert("Debe ingresar solo numeros!");
                    i=0;
                    break;
                }
            }
            if (i>0){
                dv = 11 - (( (arut[1]*3) + (arut[2]*2) + (arut[3]*7) + (arut[4]*6) + (arut[5]*5) + (arut[6]*4) + (arut[7]*3) + (arut[8]*2) )%11)
                if (dv === 10){
                    dv = "K";
                } else if (dv === 11){
                    dv = "0";
                }
                document.getElementById("dv").value= dv;
                return dv;
            }
        }
    }
</script>

<script>
    function valida() {
        mensaje ="";
        rut = document.getElementById("rut").value;
        if(rut == ""){
            mensaje = mensaje + " * Rut sin datos \n";
        }
        
        pass = document.getElementById("pass").value;
        if(pass == ""){
            mensaje = mensaje + " * Contraseña sin datos \n";
        }

        tipoC = document.getElementById("tipoC").value;
        if(tipoC == ""){
            mensaje = mensaje + " * Tipo de Cuenta sin datos \n";
        }

        monto = document.getElementById("monto").value;
        if(monto == ""){
            mensaje = mensaje + " * Monto a Girar sin datos \n";
        }

        if(mensaje!=""){
            mensaje = "Datos faltantes en el formulario  \n \n" + mensaje;
            alert(mensaje);
            return false;
        }   
    }
</script>
<script>
    function soloNumeros(e){
        var key = window.Event ? e.which : e.keyCode
        return (key >= 48 && key <= 57)
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Acceso</title>
</head>
<body style="display: grid; justify-content: center; background-color: #EAFAF1">
    <h1></h1>
    <h1>Ingreso Exclusivo Clientes CIISA</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="../Controller/ControllerRegisterClient.php" method="POST" onsubmit="return valida()">
                <div class="md-6">
                    <label for="rut">Rut Cliente</label>
                    <input type="text" class="form-control" id="rut" name="rut" placeholder="ejemplo: 17309211" onkeyup="validaRut()">
                </div>
                <div class="md-1">
                    <label for="dv">-</label>
                    <input type="text" class="form-control" name="dv" id="dv" placeholder="K">
                </div>
                
                <div class="md-6">
                    <label for="pass">Contraseña</label>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="*******">
                </div>
                <div class="md-6">
                    <label for="tipoC">Tipo de Cuenta</label>
                    <select name="tipoC" id="tipoC" class="form-control">
                        <option value=""></option>
                        <option>Cuenta Corriente</option>
                        <option>Cuenta Vista</option>
                    </select>
                </div>
                <div class="md-6">
                    <label for="monto">Monto a Girar</label>
                    <input type="text" class="form-control" name="monto" id="monto" placeholder="100000" onkeypress="return soloNumeros(event)">
                </div>
                <div class="md-6">
                    <p><i>* guión calculado automáticamente</i></p>
                </div>
                <button type="submit" class="btn btn-success">GO!</button>
            </form>
</body>
</html>
