<h1>Home Alterno</h1>
<hr/>
<table>
    <tr>
        <th>
            Código
        </th>
        <th>
            Producto
        </th>
        <th>
            Precio
        </th>
    </tr>
    {{foreach productos}}
    <tr>
        <td>
            {{cod}}
        </td>
        <td>
            {{dsc}}
        </td>
        <td>
            L{{prc}}
        </td>
    </tr>
    {{endfor productos}}
    {{foreach productos2}}
    <tr>
        <td>
            {{cod}}
        </td>
        <td>
            {{dsc}}
        </td>
        <td>
            L{{prc}}
        </td>
    </tr>
    {{endfor productos2}}
</table>
