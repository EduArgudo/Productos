<div class="form-group">
    <label for="nombre_producto">Nombre del Producto</label>
    <input type="text" name="nombre_producto" class="form-control" value="{{ old('nombre_producto', $producto->nombre_producto ?? '') }}">
</div>
<div class="form-group">
    <label for="precio">Precio</label>
    <input type="text" name="precio" class="form-control" value="{{ old('precio', $producto->precio ?? '') }}">
</div>
<div class="form-group">
    <label for="stock">Stock</label>
    <input type="number" name="stock" class="form-control" value="{{ old('stock', $producto->stock ?? '') }}">
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
