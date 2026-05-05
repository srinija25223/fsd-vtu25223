package com.example.fsdp;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.cloud.client.discovery.EnableDiscoveryClient;

@SpringBootApplication
@EnableDiscoveryClient
public class MicroPraticeHomeServiceApplication {
    public static void main(String[] args) {
        SpringApplication.run(MicroPraticeHomeServiceApplication.class, args);
    }
}