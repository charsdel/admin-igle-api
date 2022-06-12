<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://avatars.githubusercontent.com/u/97710673?s=400&u=63ea00f9dae7435736fd213253c3c3a22387d36f&v=4" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
