<h1>Laravel Guesty</h1>

<h2><a id="user-content-quick-start" class="anchor" aria-hidden="true" href="#quick-start"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Quick start</h2>
<p>Install via composer:</p>
<pre>
<code>composer require taskinbirtan/laravel-guesty
</code>
</pre>
<p>In your env please set:</p>
<pre>
<code>
env("GUESTY_USERNAME") <br>
env("GUESTY_PASSWORD") <br>
env("GUESTY_ACCOUNT_ID") <br>
these values must be set within .env
</code>
</pre>

<pre>
<code>
'providers' => [
    TaskinBirtan\LaravelGuesty\LaravelGuestyServiceProvider::class
],
</code>
</pre>

<p>In your controller</p>
<pre>
<span class="pl-k">use</span> <span class="pl-v">TaskinBirtan</span>\<span class="pl-v">LaravelGuesty</span>\<span class="pl-v">GuestyApi</span>;

 <span class="pl-v">$client</span>=<span class="pl-v">new GuestyApi(); <br></span>
 <span class="pl-v">$client</span>-><span class="pl-v"><br>setReservationListingId("some-listing-id")<br>->setReservationCheckInDate("2020-09-27")<br>->setReservationCheckOutDate("2020-10-04")
   <br>->setReservationAccountId(env('GUESTY_ACCOUNT_ID'))
   <br>->setReservationGuest("Birtan", "Taskin", "phoneNumber", "someEmail")
   <br>->setReservationMoneyObject(200, "TRY")
   <br>->setSource("TheSourceString")
   <br>->setReservationStatus('awaiting_payment');
   <br>
   $response = json_decode($client->makeReservation());

 </span>

<code>
// add your logic ...
</code>



</pre>

<h2>
Supported Versions
</h2>
<table>
<thead>
<tr>
<th>Version</th>
<th>Laravel Version</th>
<th>Php Version</th>
</tr>
</thead>
<tbody>
<tr>
<td>0.1</td>
<td>>=5.8</td>
<td>>=7.2</td>
</tr>
</tbody>
</table>


<p>
Buy me a beer... just kidding :D </p>
