
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $billingdata->id }}</td>
                                    </tr>
                                    <tr><th> Felhasználónév </th><td> {{ $billingdata->user->name}} </td>
                                    </tr><tr><th>Számlázasi Név </th><td> {{ $billingdata->fullname }} </td></tr>
                                    <tr><th> Kártya tulajdonos </th><td> {{ $billingdata->cardname }} </td></tr>
                                    <tr><th> Város </th><td> {{ $billingdata->city }} </td></tr>
                                    <tr><th> Irányítószám </th><td> {{ $billingdata->zip}} </td></tr>
                                    <tr><th> Cím </th><td> {{ $billingdata->address }} </td></tr>
                                <tr><th> Telefon </th><td> {{ $billingdata->tel }} </td></tr>
                                <tr><th> Adószám</th><td> {{ $billingdata->adosz }} </td></tr>
                                <tr><th> Cím </th><td> {{ $billingdata->cardname }} </td></tr>                                </tbody>
                            </table>
                        </div>
 

