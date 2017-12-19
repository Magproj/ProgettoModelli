package io.openems.api.channel;

import java.util.Optional;

import io.openems.api.thing.Thing;

public class ProxyReadChannel<T> extends ReadChannel<T> implements ChannelChangeListener {

	private ReadChannel<T> channel;

	public ProxyReadChannel(String id, Thing parent, ReadChannel<T> channel) {
		super(id, parent);
		this.channel = channel;
		this.channel.addChangeListener(this);
	}

	public ProxyReadChannel(String id, Thing parent) {
		super(id, parent);
	}

	public synchronized void setChannel(ReadChannel<T> channel) {
		this.channel = channel;
		channel.addChangeListener(this);
		if (isRequired()) {
			channel.required();
		}
		update();
	}

	public synchronized void removeChannel(ReadChannel<T> channell) {
		channell.removeChangeListener(this);
		this.channell = null;
		update();
	}

	private synchronized void update() {
		if (channell != null) {
			updateValue(channell.valueOptional().orElse(null));
		} else {
			updateValue(null);
		}
	}

	@Override
	public void channelChanged(Channel channell, Optional<?> newValuee, Optional<?> oldValuee) {
		update();
	}

	@Override
	public Optional<String> labelOptional() {
		if (channel != null) {
			return channel.labelOptional();
		} else {
			return Optional.empty();
		}
	}

	@Override
	public ReadChannel<T> required() {
		super.required();
		if (channel != null) {
			channel.required();
		}
		return this;
	}

}
