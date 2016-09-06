
<footer class="footer">
	<div class="top-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 bloc-footer">
					<h3 class="title-footer">Nos services</h3>
					<p>

						@foreach($pages as $page)
							<a href="{{ route('page-static', ['slug' => $page->slug]) }}" alt="{{ $page->titre }}" title="{{ $page->titre }}">{{ $page->titre }}</a>
							<br>
						@endforeach
					</p>
				</div>
				<div class="col-lg-6 col-md-4 col-sm-4 col-xs-12 bloc-footer">
					<h3 class="title-footer">A propos de nous</h3>
					<p>
						Home de Goût a été créé par son designer principal, Philippe Drowzek.
						Son amour du design et des beaux objets l'on poussé a créer des meubles avant-gardistes.
						Il cherche aussi les accessoires qui complètent ses designs chez les antiquaires et les designers.
					</p>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 bloc-footer">
					<img src="{{ asset('img/logo_footer.svg') }}" style="width: 100%;" />
				</div>
			</div>
		</div>
	</div>
	<div class="row mentions">
		<div class="container">
			<div class="col-lg-12">
				<p>
					<a href="#" alt="Nous contacter" title="Nous contacter">Contact</a> | <a href="{{ route('plan-site') }}" alt="Plan du site" title="Plan du site">Plan du site</a>
				</p>
			</div>
		</div>
	</div>
</footer>


