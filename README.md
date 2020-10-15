# Imagine

<p align="center">
	<img src="https://github.com/programarivm/imagine/blob/master/resources/ethic-logo.jpg" />
</p>

<p align="center">
	Ethical, social money with the Roll API.
</p>

### Intro

Today the world needs to boost bartering, consume less, promote human interaction as well as civil rights, and eliminate global slavery too.

Capitalism as we know it, can dramatically change in the next few years because of COVID or climate disruption. What about traditional banking in the midst of a chaos? If you're not too clear about that, let's just imagine how a better world can be.

### About ETHIC (EHC)

ETHIC is a solidarity currency operating in the digital landscape.

The value of ETHIC resides in ethics. The aim of it is to provide a sustainable alternative to traditional money controlled by third parties such as central banks or the global freelance platforms market, just to name a few.

EHC is also a karmic, trust indicator behaving as a powerful attractor rather than any other thing. Also, as opposed to other currencies, the purpose of EHC is simply usage. It doesn't actually make any sense to accumulate or invest EHC.

> If you're an EHC user, let's just work together!

### Embedding ETHIC Payments Into Websites

Can you imagine? It is all about tuning with the forces in the universe that'll provide you with what you actually deserve, and vice versa.

Imagine is an easy-to-use embeddable form that demonstrates how to transfer ethical trust in the form of social money through the [Roll API](https://docs.tryroll.com/) when paying for goods and services on the Internet. It can be easily revamped into a variety of flavors such as a WordPress plugin.

### Proof of Concept

Let's say Bob is a "software developer" using the freelancing platform Acme for a living on a regular basis.

All of a sudden he gets a new request from a client and decides to use Acme as an "employer" for the first time, which means to use the services of Alice, who is a data scientist. The problem is Acme users (Alice) can't see any previous feedback indicator (stars) on how ethical Bob might be as an employer.

Here is where ETHIC comes to the rescue!

Bob tells Alice he is an ETHIC user, an amazing human being on this planet, and shares with her the URL of his payment form on Imagine.

Finally, once the task is completed Bob might want to get some EHC from the 100.00 USD transaction with Alice, in which case he'll ask her to please transfer 1, 2, 3, 4 or 5 EHC, if she is okay with that.

<p align="center">
1 EHC = 1 milligram of gold
</p>

> Alternatively, if Acme is integrated with Imagine out-of-the-box Alice will get a nice user-friendly HTML popup on Acme.

In a nutshell, this is nothing but a rating system in the form of an EHC transaction from Alice to Bob.

Remember:

- EHC is also a karmic, trust indicator
- Its purpose is simply usage
- It doesn't actually make sense to accumulate or invest EHC
- If you're an EHC user, let's just work together!

### Development

Should you want to play around with the development environment follow the steps below.

Create an `.env` file and update it accordingly:

	$ cp .env.example .env

Generate a development SSL certificate:

	$ docker exec -it imagine_php_fpm bash/ssl.sh

Build the Docker containers:

	$ docker-compose up -d

Run the tests:

	$ docker exec -it imagine_php_fpm vendor/bin/phpunit --configuration phpunit-docker.xml

### Contributions

Would you help make this app better?

- Feel free to send a pull request
- Drop an email at info@programarivm.com with the subject "Imagine"
- Leave me a comment on [Twitter](https://twitter.com/programarivm)

Thank you.
