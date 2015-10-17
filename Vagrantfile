# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

    config.vm.box = "ubuntu/trusty64"
    config.vm.hostname = "local.dev"

    config.vm.network "forwarded_port", guest: 80, host: 8080

    config.vm.network "private_network", ip: "192.168.35.10"

    config.vm.synced_folder ".", "/home/vagrant/local.dev", :mount_options => ['dmode=777', 'fmode=777']

    config.vm.provider "virtualbox" do |vb|
        vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        vb.gui = true
        vb.memory = 1024
    end

    config.vm.provision "shell" do |s|
        s.path = "util/vg_deploy.sh"
    end
end
