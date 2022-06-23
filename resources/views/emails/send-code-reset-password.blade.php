@component('mail::message')
<h1>Hemos recibido una solicitud para reiniciar su Clave</h1>
<p>Usted Debe ingresar el siguiente código en su APP:</p>

@component('mail::panel')
{{ $code }}
@endcomponent

<p>Este código tiene un tiempo de duración</p>
@endcomponent