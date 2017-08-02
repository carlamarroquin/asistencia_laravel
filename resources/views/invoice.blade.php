

<main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h4 align="center">UNIVERSIDAD DE EL SALVADOR<BR/>
          FACULTAD DE INGENIERIA Y ARQUITECTURA ESCUELA  DE ARQUITECTURA<BR/>
          ESCUELA DE ARQUITECTURA</h4>
          <h4 align="center">LISTA DE ASISTENCIA DE PERSONAL DOCENTE</h4>

        </div>
      </div>
      
      <table border="3px" cellspacing="2px" cellpadding="1px" width="100%">
        <thead>
        <tr>
            <th class="desc">Docente</th>
            <th class="unit">Fecha</th>
            <th class="total">Hora</th>
            <th class="total">Tipo</th>
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
