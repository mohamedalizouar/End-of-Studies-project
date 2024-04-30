<x-app-layout>
    <div class="container">
        <h2>Command Details</h2>
    
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>num commande</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalAmount = 0;
                @endphp

                @foreach ($commandesdutil as $commandeDetail)
                    <tr>
                        <td>{{ $commandeDetail->id }}</td>
                        <td>{{ $commandeDetail->product->product_name }}</td>
                        <td>{{ $commandeDetail->quantity }}</td>
                        <td>{{ $commandeDetail->total_amount }} DT</td>
                        <td>{{ $commandeDetail->cammandes_id }}</td>
                    </tr>

                    @php
                        $totalAmount += $commandeDetail->total_amount;
                    @endphp
                @endforeach
    
                <tr>
                    <td colspan="3"></td>
                    <td>Total: {{ $totalAmount }} DT</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>   
</x-app-layout>
