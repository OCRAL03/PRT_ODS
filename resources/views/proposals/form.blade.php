<form method="POST" action="/proposals">
    @csrf
    <textarea name="menu_proposal" placeholder="Propuesta de menú..." required></textarea>
    <button type="submit">Enviar</button>
</form>