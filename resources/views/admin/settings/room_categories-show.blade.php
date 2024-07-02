 
                            <table class="table table-bordered">
                                <tbody>
                 
                                <tr>
                                    <td style='width: 30%;'><b>Description</b></td>
                                    <td> {{ $RoomCategory->description }} </td>
                                </tr>
                   					
                                <tr>
                                    <td><b>Weekday Price ({!! env('CURRENCY_SIGN') !!})</b></td>
                                    <td>{{ $RoomCategory->weekday_price }}</td>
                                </tr>
                                <tr>
                                    <td><b>Weekend Price({!! env('CURRENCY_SIGN') !!})</b></td>
                                    <td>{{ $RoomCategory->weekend_price }} </td>
                                </tr>
                                </tbody>
                            </table>
                         
 