
	<div class="thumbnail-comment">
		<div class="caption">
			<h4 class="review-title">{{ $review->titre }}</h4>
			<p>
				Ajouté le {{ date('d.m.Y', strtotime($review->created_at)) }}<br />
				{{ $review->texte }}
			</p>
		</div>
	</div>
