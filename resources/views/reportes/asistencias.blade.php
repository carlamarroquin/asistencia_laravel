
<main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h4 align="center">UNIVERSIDAD DE EL SALVADOR<BR/>
          FACULTAD DE INGENIERIA Y ARQUITECTURA ESCUELA  DE ARQUITECTURA<BR/>
          ESCUELA DE ARQUITECTURA</h4>
          <h4 align="center">REPORTE DE ASISTENCIAS POR DOCENTE</h4>

        </div>
      </div>
      
      <table border="3px" cellspacing="2px" cellpadding="1px" width="100%">
        <thead>
        
        <tr>
            <th rowspan="2">Docente</th>
                @for($i=0; $i < 6; $i++)
                 @for($j =0; $j < count($dias) ;$j++)
                  <th>{{$dias[$j]}}</th>
                 @endfor
                @endfor 
            <tr>
                <th>1</th>
                <th class="total">Total Asistencias</th>
            <th class="total">% Asistencias</th>
        
            </tr>

        </tr>
        </thead>
         @foreach($data as $d)
        <tbody>
          <tr>
          <td align="center">{{$d->id_docente}}</td>
          <td align="center">{{$d->fecha}}</td>
          <td align="center">{{$d->dia}}</td>
          <td align="center">{{$d->indexDia}}</td>
          </tr>
          
        </tbody>
        @endforeach
     </table>
</main>
