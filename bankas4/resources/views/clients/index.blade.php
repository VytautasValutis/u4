<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                    <a href="" style="text-decoration: none;">
                    # <span style="color: red;">a_s</span></a></th>
                <th scope="col">A.k.</th>
                <th scope="col">Vardas</th>
                <th scope="col">
                    <a href="" style="text-decoration: none;">
                    Pavardė <span style="color: red;">d_s</span></a></th>
                <th scope="col">
                    <a href="" style="text-decoration: none;">
                    Lėšos <span style="color: red;">e_s</span></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $v)
            <tr>
                <th scope="row">{{$v->accNr}}</th>
                <td>{{$v->persCode}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->surname}}</td>
                <td><b>{{$v->value}}</b></td>
                <td>
                    <form action="" method="post">
                    <button type="submit" class="btn btn-outline-success">Prideti lėšų</button>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                    <button type="submit" class="btn btn-outline-primary">Nuskaičiuoti lėšas</button>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                    <button type="submit" class="btn btn-outline-danger">Pašalinti sąskaitą</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>