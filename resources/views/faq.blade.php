<x-layout>
  <section class="relative overflow-hidden hero-glow">
    <div class="absolute inset-0 grid-bg opacity-70"></div>
    <div class="relative max-w-4xl mx-auto px-5 lg:px-8 py-20 text-center">
      <span class="chip">FAQ</span>
      <h1 class="font-display font-bold text-5xl md:text-6xl mt-4">Questions fréquentes.</h1>
      <p class="mt-6 text-lg text-ink-2">Tout ce que vous devez savoir avant de nous confier votre projet.</p>
    </div>
  </section>

  <section class="max-w-3xl mx-auto px-5 lg:px-8 py-12 space-y-3" id="faq">
    @php
        $faqs = [
            ["Combien coûte un site web ?", "Le prix dépend de la complexité, du nombre de pages, de la présence e-commerce et des intégrations. Un devis clair vous est fourni sous 48h."],
            ["Combien de temps pour livrer un projet ?", "Un site vitrine : 2 à 4 semaines. Une application web : 2 à 4 mois. Un chatbot IA : 7 à 14 jours. Nous fixons des jalons hebdomadaires."],
            ["Suis-je propriétaire du code ?", "Oui, systématiquement. Le code est livré sur votre repo Git avec toute la documentation."],
            ["Proposez-vous du support après livraison ?", "Oui, 3 mois de support sont inclus. Au-delà, nous proposons des forfaits mensuels."],
            ["Formez-vous à distance ?", "Oui. Nos formations sont disponibles en présentiel (Ouagadougou) et en distanciel (Google Meet ou Zoom)."],
            ["Acceptez-vous les paiements mobiles ?", "Wave, Orange Money, virement bancaire, chèque et carte bancaire — tout est possible."],
            ["Travaillez-vous avec des entreprises hors Burkina Faso ?", "Absolument. Nous collaborons déjà avec des clients au Mali, en Côte d'Ivoire, au Cameroun et en France."],
            ["Utilisez-vous l'IA en interne ?", "Oui, largement — pour le code, la documentation, le support et la R&D. Nous savons donc ce qui marche et ce qui ne marche pas."],
            ["Qui gère les données de mon chatbot IA ?", "Vous. Nous mettons en place l'infrastructure, les données restent hébergées sur vos serveurs ou sur un cloud de votre choix."],
            ["Puis-je annuler un projet en cours ?", "Oui, à tout moment. Vous ne payez que le travail effectué, facturé au sprint."]
        ];
    @endphp

    @foreach($faqs as $faq)
        <details class="card p-5 group reveal">
            <summary class="cursor-pointer font-display font-bold text-lg flex justify-between items-center list-none">
                <span>{{ $faq[0] }}</span>
                <span class="transition group-open:rotate-45 text-brand text-2xl leading-none">+</span>
            </summary>
            <p class="mt-3 text-ink-2">{{ $faq[1] }}</p>
        </details>
    @endforeach
  </section>

  <section class="max-w-3xl mx-auto px-5 lg:px-8 pb-20 text-center">
    <div class="card p-8 reveal">
      <p class="font-display font-bold text-xl">Vous n'avez pas trouvé votre réponse ?</p>
      <p class="text-muted text-sm mt-2">Notre équipe vous répond rapidement.</p>
      <a href="{{ route('contact') }}" class="btn btn-primary mt-4">Nous contacter</a>
    </div>
  </section>
</x-layout>
