# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "precise64"

  # config.vm.network :forwarded_port, guest: 80, host: 8080
  config.vm.network :private_network, ip: "192.168.33.10"

  config.vm.synced_folder "../sgp", "/var/www"

  config.vm.provision :chef_solo do |chef|
    chef.add_recipe "sgp"
  end

end
