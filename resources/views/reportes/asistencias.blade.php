

<main>
      <div id="details" class="clearfix">
      <div >
        <img class="media-object" src="images/UES.jpg" width="100" height="100" style="margin-left:50px; ">
          <h4 style="position: absolute; margin-left: 50px;"> UNIVERSIDAD DE EL SALVADOR<BR/>
           FACULTAD DE INGENIERIA Y ARQUITECTURA ESCUELA  DE ARQUITECTURA<BR/>
          ESCUELA DE ARQUITECTURA</h4>
          <h4 align="center">INFORME DE ASISTENCIAS POR DOCENTE</h4>

        </div>
      </div>
      <table border="3px" cellspacing="2px" cellpadding="1px" width="100%">
        <thead>
        
        <tr>
            <th >Docente</th> 
            <th >Tipo Contratacion</th>   
            <th>Horas Trabajadas</th>
            <th>Dias Trabajadas</th>
            <th >% Asistencias</th>
        

        </tr>
        </thead>
         @foreach($data as $d)
        <tbody>
          <tr>
          <td align="center">{{$d->nombre}}</td>
          @if($d->tipo_docente==0)
          <td align="center">TIEMPO COMPLETO</td>
          @elseif($d->tipo_docente==1)
          <td align="center">MEDIO TIEMPO</td>
          @else
          <td align="center">HORA CLASE</td>
          @endif
          <td align="center">{{$d->horas}}</td>
          <td align="center">{{$d->dias_trabajados}}</td>

          <td align="center">{{$d->porcentaje}}</td>
          </tr>
          
        </tbody>
        @endforeach
     </table>
</main>
