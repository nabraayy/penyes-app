import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";

const Sorteo = () => {
    const participantes = JSON.parse(document.getElementById("app").dataset.participantes);
    const totalCuadros = 54;
    const userRole = document.getElementById("app").dataset.role; 

    const [cuadros, setCuadros] = useState(Array(totalCuadros).fill(null));

    const asignarNombresAleatorios = () => {
        let posicionesDisponibles = Array.from({ length: totalCuadros }, (_, i) => i);
        let nombresAleatorios = [...participantes].sort(() => Math.random() - 0.5);
        let nuevoCuadros = Array(totalCuadros).fill(null);

        nombresAleatorios.forEach((nombre) => {
            if (posicionesDisponibles.length === 0) return;
            const indexRandom = Math.floor(Math.random() * posicionesDisponibles.length);
            const posicionSeleccionada = posicionesDisponibles.splice(indexRandom, 1)[0];
            nuevoCuadros[posicionSeleccionada] = nombre;
        });

        setCuadros(nuevoCuadros);
    };

    useEffect(() => {
        asignarNombresAleatorios();
    }, []);

    return (
        <div>
            <div className="grid-container">
                {cuadros.map((nombre, index) => (
                    <div key={index} className={`grid-item ${nombre ? "occupied" : ""}`}>
                        {nombre && <p>{nombre}</p>}
                    </div>
                ))}
            </div>

           
            {userRole == "1" && (  
                <div className="button-container">
                    <button className="btn-primary" onClick={asignarNombresAleatorios}>
                        Reasignar Nombres 🔄
                    </button>
                </div>
            )}
        </div>
    );
};

if (document.getElementById("app")) {
    ReactDOM.render(<Sorteo />, document.getElementById("app"));
}
