<x-admin-layout>
<div class = "flex flex-wrap my-5 -mx-2">       

                <x-statistic name="Total Properties" :count="$propertiesCount['totalProperties']" icon="property"/>
                <x-statistic name="Total Properties Free" :count="$propertiesCount['propertyFree']" icon="property"/>
                <x-statistic name="Total Properties has Tenant" :count="$propertiesCount['propertyHasTenant']" icon="property"/>
                <x-statistic name="Total Owners" :count="$ownersCount" icon="owner"/>
                <x-statistic name="Total Tenants" :count="$tenantsCount" icon="tenant"/>
                     
        </div>
</x-admin-layout>