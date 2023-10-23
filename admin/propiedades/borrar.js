function borrarPropiedad(id) {
    if (confirm('¿Estás seguro de que deseas eliminar esta propiedad?')) {
        fetch(`/ruta/para/borrar.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Actualizar la interfaz si es necesario
                    location.reload();
                } else {
                    alert('Error al eliminar la propiedad.');
                }
            });
    }
}
