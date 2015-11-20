<h1>Mensajes Registrados</h1>
<b>Mostrando {{mensajescount}} Registros</b>
<table>
    <tr>
        <th>
            Código
        </th>
        <th>
            Mensaje
        </th>
    </tr>

{{foreach mensajes}}
    <tr>
        <td>
            {{msgid}}
        </td>
        <td>
            {{msgdsc}}
        </td>
    </tr>

{{endfor mensajes}}

</table>
