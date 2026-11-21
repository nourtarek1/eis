<x-layouts.app title="Home"
    description="Engineering, industrial and EPC solutions from Engineering Innovation Systems.">
    <x-home.hero-slider />
    <x-home.introduction />
    <x-home.services :services="$services" />
    <x-home.industries :sectors="$sectors" />
    <x-home.projects :projects="$projects" />
    <x-home.key-capabilities />
    <x-home.why-eis />
    <x-home.partners :partners="$partners" />
    <x-home.cta />
</x-layouts.app>
