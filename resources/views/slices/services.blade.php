<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Cardápio</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if(count($flavour_retrieve) == 0)
                <div class="alert alert-info" role="alert">Nenhum sabor encontrado com a sua pesquisa.</div>
            @else
                <table class='table table-bordered table-hover table-striped'>
                    <tr>
                        <td>Nome sabor</td>
                        <td>Valor</td>
                        <td>Valor promocional</td>
                    </tr>
                    @foreach ($flavour_retrieve as $flavour)
                        <tr>
                            <td> {{ $flavour->name }} </td>
                            <td>R$ {{ number_format($flavour->old_value , 2 , ',' , '.' ) }} </td>
                            <td>R$ {{ number_format($flavour->new_value , 2 , ',' , '.' ) }} </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
</section>
