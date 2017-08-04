

<main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h4 align="center">UNIVERSIDAD DE EL SALVADOR<BR/>
          FACULTAD DE INGENIERIA Y ARQUITECTURA ESCUELA  DE ARQUITECTURA<BR/>
          ESCUELA DE ARQUITECTURA</h4>
          <h4 align="center">REPORTE DE MARCACIONES POR DOCENTE</h4>

        </div>
      </div>
      <table border="3px" cellspacing="2px" cellpadding="1px" width="100%">
        <thead>
        <tr>
            <th class="desc">Docente </th>
            <th class="fecha">Fecha</th>
            <th class="hora">Hora</th>
            <th class="mar">Tipo Marcacion</th>
        </tr>
        </thead>
         @foreach($data as $d)
        <tbody>
          <tr>
          <td align="center">{{$d->docente}}</td>
          <td align="center">{{$d->fecha}}</td>
          <td align="center">{{$d->marcacion}}</td>
          <td align="center">{{$d->tipo}}</td>
          </tr>
          
        </tbody>
        @endforeach
     </table>
</main>
